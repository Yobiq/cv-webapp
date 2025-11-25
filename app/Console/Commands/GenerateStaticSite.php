<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

final class GenerateStaticSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'static:generate {--output=build}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Render the public site to static HTML files';

    private HttpKernel $httpKernel;

    public function __construct(HttpKernel $httpKernel)
    {
        parent::__construct();

        $this->httpKernel = $httpKernel;
    }

    public function handle(): int
    {
        $outputPath = base_path($this->option('output'));

        $this->prepareOutputDirectory($outputPath);
        $this->copyPublicAssets($outputPath);
        $this->renderPages($outputPath);

        $this->info("Static site generated in: {$outputPath}");

        return self::SUCCESS;
    }

    private function prepareOutputDirectory(string $outputPath): void
    {
        if (File::exists($outputPath)) {
            File::deleteDirectory($outputPath);
        }

        File::makeDirectory($outputPath, recursive: true);
    }

    private function copyPublicAssets(string $outputPath): void
    {
        $publicPath = public_path();

        $exclusions = [
            'index.php',
            'server.php',
            'hot',
        ];

        foreach (File::allFiles($publicPath) as $file) {
            $relativePath = $file->getRelativePathname();

            if (in_array($relativePath, $exclusions, true)) {
                continue;
            }

            $target = $outputPath . DIRECTORY_SEPARATOR . $relativePath;
            File::ensureDirectoryExists(dirname($target));

            File::copy($file->getPathname(), $target);
        }

        // Copy directories, so empty folders are preserved
        foreach (File::directories($publicPath) as $directory) {
            $relativePath = str_replace($publicPath . DIRECTORY_SEPARATOR, '', $directory);

            if (in_array($relativePath, $exclusions, true)) {
                continue;
            }

            File::ensureDirectoryExists($outputPath . DIRECTORY_SEPARATOR . $relativePath);
        }
    }

    private function renderPages(string $outputPath): void
    {
        $pages = [
            '/' => 'index.html',
            '/about' => 'about/index.html',
            '/projects' => 'projects/index.html',
            '/resume' => 'resume/index.html',
            '/contact' => 'contact/index.html',
            '/services' => 'services/index.html',
        ];

        foreach ($pages as $uri => $targetFile) {
            $request = Request::create($uri, 'GET');
            $response = $this->httpKernel->handle($request);

            if ($response->isSuccessful()) {
                $targetPath = $outputPath . DIRECTORY_SEPARATOR . $targetFile;
                File::ensureDirectoryExists(dirname($targetPath));
                File::put($targetPath, $response->getContent());
                $this->info("Generated {$targetFile}");
            } else {
                $this->error("Failed to render {$uri}: HTTP {$response->getStatusCode()}");
            }

            $this->httpKernel->terminate($request, $response);
        }
    }
}

