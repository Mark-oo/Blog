<nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="/">Myblog</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

     <div class="collapse navbar-collapse" id="navbarNavDropdown">
       <ul class="navbar-nav">
         <li class="nav-item {{Request::is('/')?"active":""}}"><a class="nav-link" href="/">Home</a></li>
         <li class="nav-item {{Request::is('contact')?"active":""}}"><a class="nav-link" href="/contact">Contact</a></li>
         <li class="nav-item {{Request::is('about')?"active":""}}"><a class="nav-link" href="/about">About</a></li>
       </ul>
     </div>
     <div class="collapse navbar-collapse " id="navbarNavDropdown">
       <ul class="navbar-nav ml-md-auto ">
         <li class="nav-item dropleft">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            My Account
           </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <li><a class="dropdown-item" href="#">Action</a></li>
             <li><a class="dropdown-item" href="#">Another Action</a></li>
             <li><a class="dropdown-item" href="#">And Another Action</a></li>
             <li class="dropdown-divider"></li>
             <li><a class="dropdown-item" href="#">Separated Action</a></li>
           </ul>
         </li>
       </ul>
     </div>
</nav>
