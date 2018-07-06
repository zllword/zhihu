@component('mail::message')
# Hello,{{$name}}

请点击下面按钮连接验证您的邮箱

@component('mail::button', ['url' =>'http://zhi.hu/check?token=' . $token])
验证邮箱
@endcomponent

http://zhi.hu/check?token={{$token}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
