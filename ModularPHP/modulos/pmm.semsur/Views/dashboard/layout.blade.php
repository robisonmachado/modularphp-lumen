<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

@section("head")
  @include('pmm@semsur::dashboard.head')
@show

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900"
        :class="{ 'overflow-hidden': isSideMenuOpen }">

@section("conteudo")

  @section('sidebar')

  @show


  <div class="flex flex-col flex-1 w-full">
  @section('header')

  @show


  @section('main')

  @show



@show


  </div>



  </div>
</body>
</html>
