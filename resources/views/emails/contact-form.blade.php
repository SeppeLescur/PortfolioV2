<h1>Contact Form Submission</h1>
<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Message:</strong> {{ $data['message'] }}</p>

@if(isset($data['comfirmation']))
  Did someone use your email-address? notify us!
@endif