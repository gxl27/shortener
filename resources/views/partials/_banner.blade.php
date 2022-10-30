<div id='banner'>
  <img style="width:100%" src="/images/banner.jpg" alt='banner'>
  <div class='banner-text'>
    <div class='flex-column align-center'>
      <img src="{{asset('images/logo.svg')}}" alt="logo" class="logo"/>
      <div class='text-sm primary-color text-center pt-1'>- Short or expand your link -</div>
    </div>
    
    <div class='flex flex-column w-100 text-center'>
      <span>More than {{ $linksCount }} links</span>
      <span>More than {{ $clicksCount }} link clicks</span>
    </div>
    <div class='flex'>
    @guest
      <a href="{{route('register')}}"><div class="btn btn-primary mx-3">Register</div></a>
      <a href="{{route('login')}}"><div class="btn btn-success mx-3">Login</div></a>
   
    @else
      <a href="{{route('admin')}}"><div class="btn btn-primary">Admin Panel</div></a>
    @endguest
  </div>
  </div>
 </div>