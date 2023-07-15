
<style>
    .menu {
    background: $primary;
    height: 61px;
    display: flex;;
    justify-content: space-between;
    align-items: center;
    padding: 45px;
    }
    
    .logo {
        margin-left: 100px;
        height: 46px;
    }
    ul li a {
                color: #fff;
                height: 46px;
                width: 46px;
                font-size: 22px;
                background: #570bd7;
                display: flex;
                border-radius: 50%;
                justify-content: center;
                align-items: center;
                text-decoration: none;
                transition: all 0.5s ease;
                position: relative;
            }    
    ul li a .info-count {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        position: absolute;
        justify-content: center;
        align-items: center;
        display: flex;
        font-size: 12px; 
        background: #ff36f7;
        top: 0;
        right: 0;
        transform: translate(20%, -20%);
        color: #fff;
    }   
    ul {
        list-style: none;
        display: flex;
        align-items: cente;
        margin: 0;
        gap: 30px;                   
    }
</style>


<nav class="menu">
    <a href="{{route('home')}}">
        {{-- <img class="logo" src="{{asset('img/logo.svg')}}" alt=""> --}}
        <h2 style="color: #570bd7; font-family:'Berlin Sans FB', Demi;">TheBrickKingdom</h2>
    </a>
    <ul>
        <li>
            <a href="{{route('home')}}">
                <svg width="36" height="36" viewBox="0 0 36 36"><path fill="currentColor" d="M33 19a1 1 0 0 1-.71-.29L18 4.41L3.71 18.71A1 1 0 0 1 2.3 17.3l15-15a1 1 0 0 1 1.41 0l15 15A1 1 0 0 1 33 19Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="currentColor" d="M18 7.79L6 19.83V32a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76Z" class="clr-i-solid clr-i-solid-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
            </a>
        </li>
        <li>
            <a href="{{route('wishlist')}}">
                @auth
                    <span class="info-count">{{count(auth()->user()->wishlist)}}</span>
                @endauth
                <svg width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4.595a5.904 5.904 0 0 0-3.996-1.558a5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595zm6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584c.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a.999.999 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002z"/></svg>
            </a>
        </li>
        <li>
            <a href="{{route('cart')}}">
                <span class="info-count">{{session()->has('cart') ? count(session('cart')) : 0}}</span>
                <svg width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1V2m6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5H16Z"/></svg>
            </a>
        </li>
        <li>
            <a href="{{route('account')}}">
                <svg width="36" height="36" viewBox="0 0 256 256"><path fill="currentColor" d="M234.38 210a123.36 123.36 0 0 0-60.78-53.23a76 76 0 1 0-91.2 0A123.36 123.36 0 0 0 21.62 210a12 12 0 1 0 20.77 12c18.12-31.32 50.12-50 85.61-50s67.49 18.69 85.61 50a12 12 0 0 0 20.77-12ZM76 96a52 52 0 1 1 52 52a52.06 52.06 0 0 1-52-52Z"/></svg>
            </a>
        </li>
    </ul>
</nav>
