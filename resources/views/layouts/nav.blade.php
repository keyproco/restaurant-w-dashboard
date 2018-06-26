
<div class="container">
    <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
    </a>

    <div class="navbar-menu" id="navMenu">
        <div class="navbar-start">
            <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
            </a>
        </div>
        <div class="navbar-end">
            <!-- Authentication Links -->
            @guest
            <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
            @else
            <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest       
    </div>
</div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

// Get all "navbar-burger" elements
var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
// Check if there are any navbar burgers
if ($navbarBurgers.length > 0) {

// Add a click event on each of them
$navbarBurgers.forEach(function ($el) {
    $el.addEventListener('click', function () {

// Get the target from the "data-target" attribute
var target = 'navMenu';
var $target = document.getElementById(target);

// Toggle the class on both the "navbar-burger" and the "navbar-menu"
$el.classList.toggle('is-active');
$target.classList.toggle('is-active');

});
});
}

});
</script>