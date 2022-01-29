Dear Admin, {{ $name }} posted an Inquiry.<br><br>

<b>Inquiry Message: </b> <br>
{{ $comment }}<br><br>

<a class="btn btn-primary" href="mailto:{{ $email }}?subject=ZimboDelights Feedback">Reply Inquiry</a><br><br>

Thanks,<br><br>
{{ config('app.name') }}
