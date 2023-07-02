<form action="{{route('contact-me.store')}}" method="{{$form['method']}}">
    @csrf
    <label>FORM</label>
    <label for="email">email<input type="email" name="email" id='email' placeholder="email@example.com"></label>
    <label for="name">name<input type="text" name="name" id='name' placeholder=""></label>
    <label for="subject">subject<input type="text" name="subject" id='subject' placeholder=""></label>
    <label for="content">content<textarea name="content" id='content' placeholder=""></textarea></label>
    <button type="submit">Send</button>
</form>