<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Je naam is verplicht.',
            'name.max' => 'Je naam mag maximaal 255 tekens bevatten.',
            'email.required' => 'Je e-mailadres is verplicht.',
            'email.email' => 'Vul een geldig e-mailadres in.',
            'email.max' => 'Je e-mailadres mag maximaal 255 tekens bevatten.',
            'subject.required' => 'Onderwerp is verplicht.',
            'subject.max' => 'Onderwerp mag maximaal 255 tekens bevatten.',
            'message.required' => 'Bericht is verplicht.',
            'message.max' => 'Bericht mag maximaal 5000 tekens bevatten.',
        ];
    }
}




