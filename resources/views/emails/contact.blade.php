@php
    /** @var string $name */
    /** @var string $email */
    /** @var string $subject */
    /** @var string $message */
@endphp

<h2>Nieuwe contactaanvraag via EG Web Solutions</h2>

<p><strong>Naam:</strong> {{ $name }}</p>
<p><strong>E-mail:</strong> {{ $email }}</p>
<p><strong>Onderwerp:</strong> {{ $subject }}</p>

<p><strong>Bericht:</strong></p>
<p>{!! nl2br(e($message)) !!}</p>


