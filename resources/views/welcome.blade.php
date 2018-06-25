@include('layouts.head')

@include('layouts.nav')



<a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
  <span aria-hidden="true"></span>
  <span aria-hidden="true"></span>
  <span aria-hidden="true"></span>
</a>

<div class="navbar-menu" id="navMenu">
    <div class="container">
        <div class="navbar-end">
        <div class="navbar-start">
           <a href="/" class="navbar-item">Homepage</a>
        </div>
            <a href="/" class="navbar-item">Homepage</a>
            <a href="/about" class="navbar-item">About</a>
            <a href="/contact" class="navbar-item">Contact</a>
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
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
</script>