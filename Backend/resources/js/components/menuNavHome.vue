<template>
    <div>
    <nav>
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{route('login.form')}}">Login</a></li>
        <li><a href="{{route('login.create')}}">registro</a></li>
        <button class="buttonNavSair"><a href="{{ route('login.form')}}">Sair</a></button> 
      </ul>
    </div>
  </nav>
   </div>
</template>




<script>
</script>




<style>
.buttonNavSair{
    padding: 5px;
}

</style>