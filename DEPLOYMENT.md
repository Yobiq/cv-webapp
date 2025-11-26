# Deployment Instructions

This CV web application does **not use a database**. All content is stored in `config/cv.php`.

## Environment Variables

**Required:**
- `DB_CONNECTION=array` (or leave unset - defaults to array)
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_KEY` (generate with `php artisan key:generate`)

**Optional (for contact form):**
- `RESEND_API_KEY` (if using Resend for email)
- `RESEND_FROM_EMAIL`
- `RESEND_TO_EMAIL`

## Deployment Steps

1. **Set environment variables:**
   ```bash
   DB_CONNECTION=array
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Install dependencies:**
   ```bash
   composer install --no-dev --optimize-autoloader
   npm ci
   npm run build
   ```

3. **Optimize Laravel:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

4. **DO NOT run migrations** - this app does not use a database!

## Platform-Specific Notes

### Railway Deployment

1. **Connect your GitHub repository:**
   - Go to [Railway](https://railway.app)
   - Click "New Project" → "Deploy from GitHub repo"
   - Select your repository (`Yobiq/cv-webapp`)

2. **Set Environment Variables:**
   In Railway dashboard, go to Variables tab and add:
   ```
   DB_CONNECTION=array
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:YOUR_GENERATED_KEY_HERE
   ```
   
   To generate APP_KEY, run locally:
   ```bash
   php artisan key:generate --show
   ```

3. **Optional (for contact form):**
   ```
   RESEND_API_KEY=your_resend_api_key
   RESEND_FROM_EMAIL=Eyobielgoitom10@gmail.com
   RESEND_TO_EMAIL=Eyobielgoitom10@gmail.com
   ```

4. **Disable Migrations:**
   - Railway may try to run migrations automatically
   - The app will work fine since we use `array` driver
   - No action needed - migrations will fail gracefully

5. **Deploy:**
   - Railway will automatically detect Laravel and use the `Procfile` or `railway.toml`
   - The app will be available at `https://your-app-name.up.railway.app`

### Render / Similar Platforms

- Set `DB_CONNECTION=array` in your environment variables
- Disable automatic migrations in your platform settings
- Use the provided `deploy.sh` script if supported

### Traditional Hosting

- Upload files to your web server
- Set environment variables in `.env`
- Point web server to `public/` directory
- Ensure PHP 8.2+ is installed

## Troubleshooting

**Error: "could not find driver"**
- Solution: Set `DB_CONNECTION=array` in your environment variables

**Error: "Running migrations and seeding database"**
- Solution: Disable automatic migrations in your deployment platform settings

