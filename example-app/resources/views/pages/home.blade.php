<style>
   @import './components/home/header.sass';
   .products-section{
      padding: 70px;
   }
      .section-title {
         font-size: 30px;
         font-weight: 600;
         text-align: center;
         margin-bottom: 30px;
         color: rgb(60, 125, 194);
      }        
   .products-row {
      display: flex;
      gap: 25px;
      flex-wrap: wrap;
   }
      
</style>


@extends("layouts.master")
@section('title', 'Home')
@section('content')
   <main class="homepage">
        @include('pages.components.home.header')

        <section class="products-section">
            <div class="container">

               <h1 class="section-title">Featured Products</h1>
               <div class="products-row">
                  @foreach ($products as $product)
                      <x-product-box :product="$product"/>
                  @endforeach
               </div>

            </div>
        </section>
        
   </main>

@include('pages.components.footer')
@endsection