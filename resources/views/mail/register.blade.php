@component('mail::message')
# Hello,{{$name}}

请点击下面按钮连接验证您的邮箱

@component('mail::button', ['url' => $url])
验证邮箱
@endcomponent

{{$url}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
