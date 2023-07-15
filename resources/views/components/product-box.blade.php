<style>
  section a {
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
    color: rgb(249, 241, 238);
  }
    .product-box {
        border-radius: 5px;
        background: #1c7193;
        overflow: hidden;
        box-shadow: 0 8px 40px 0 rgba(49, 32, 138, 5%);
        text-align: center;
        width: 250px;
        text-decoration: none;
        transition: all 0.4s ease;

        &:hover {
            box-shadow: 0 10px 50px 2px rgba(0, 0, 0, 15%);

            .image {
                background: linear-gradient(to bottom right, #6100ff, #c31374);
            }
            .image .addToWishList {
              display: block;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, 50%);
              background: #fff;
              border-radius: 200px;
              padding: 10px 25px;
              text-align: center;
              justify-content: center;
              max-width: 90%;
              border: none;
              width: 200px;
              cursor: pointer;
              font-weight: 400;
              transition: all 0.3s ease;

              &:hover {
                color: #fff;
                background: #c31374;
              }
            }
        }

        .image {
            background: #80d9f1;
            height: 230px;
            width: 270px;
            max-width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            transition: all 0.4s ease;
            position: relative;
        }

        .image img {
            max-width: 100%;
            max-height: 100%;
        }
        .image .addToWishList {
          display: none;
        }

        .product-title {
            font-size: 18px;
            font-weight: 500;
            text-transform: capitalize;
            text-decoration: none;
            color: $pink;
            margin-bottom: 10px;
        }

        .color-plateletes {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 10px;

            .color-platelete {
                width: 20px;
                height: 5px;
                border-radius: 12px;
                background: #000;
            }
        }

        .product-category {
            color: #6f6f6f;
            font-style: italic;
            font-weight: 200;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 20px;
            color: $primary-dark;
        }
    }
</style>

<section class="product-box">
    <div class="image">
        <img src="{{ asset('storage/' . $product->image) }}" alt="">
        @auth
            @if (auth()->user()->wishlist->contains($product))
              <form action="{{route('removeFromWishlist', $product->id)}}" method="post">
                @csrf
                <button class="addToWishList" type="submit">Remove From Wishlist</button>
              </form>
            @else
              <form action="{{route('addToWishlist', $product->id)}}" method="post">
                @csrf
                <button class="addToWishList" type="submit">Add to Wishlist</button>
              </form>
            @endif
        @endauth
        
    </div>
    
    <a href="{{ route('product', $product->id) }}">
        <div class="product-title">{{ $product->title }}</div>
        <div class="color-plateletes">
            @foreach ($product->colors as $color)
              <div class="color-platelete" style="background:{{ $color->code }} "></div>
            @endforeach
        </div>
        <div class="product-category">{{ $product->categories }}</div>
        <div class="product-price">{{ $product->price / 100 }}$</div>
    </a>

</section>
