 <!doctype html>
 <html>
 <head>
     @include('users.includes.head')

 </head>
 <body bgcolor="#DADADA">
 <div class="container">

     <header class="row">
         @include('users.includes.header')
     </header>

     <div id="main" class="row">


             @yield('content')

     </div>

     <footer class="row">
         @include('users.includes.footer')
     </footer>

 </div>
 </body>
 </html>