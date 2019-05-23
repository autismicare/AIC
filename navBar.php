<?php
echo "
  <nav class='navbar navbar-expand-md bg-success navbar-dark fixed-top shadow p-3'>
    <a class='navbar-brand' href='index.php'> AutismICare</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='collapsibleNavbar'>
      <ul class='navbar-nav'>
        <li class='nav-item ml-2'>
          <a class='nav-link' href='fact.php'><i class='fa fa-bullhorn'></i> Autism Facts </a>
        </li>
        <li class='nav-item ml-2'>
          <a class='nav-link' href='event.php'><i class='fa fa-calendar'></i> Upcoming Events </a>
        </li>
        <li class='nav-item ml-2'>
          <a class='nav-link' href='login.php'><i class='fas fa-book'></i> Diary  </a>
        </li> 
        <li class='nav-item'>
          <a class='nav-link' href='login.php'><i class='fas fa-sign-in-alt ml-2'></i>   Signup / Sign-in  </a>       
        </li>    
      </ul>
    </div>  
  </nav>"
?>