<form method="POST" action="{{ route('contact.send') }}">
  @csrf
  <input type="text" name="name" placeholder="Your Name">
  <input type="email" name="email" placeholder="Your Email">
  <textarea name="message" placeholder="Your Message"></textarea>
  <button type="submit">Send</button>
</form>