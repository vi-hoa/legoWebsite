<style>
    
    .home-header {
        width: 100%;
        /* background: linear-gradient(90deg, rgba(2,0,36,1) 0%,
         rgba(205,42,171,1) 36%, rgba(0,212,255,1) 100%);padding: 100px 25px 120px; */
         /* background-color: 9681EB; */
         /* background-image: url(https://thumbs.dreamstime.com/b/vibrant-meccano-puzzle-kit-set-light-orange-paper-backdrop-bright-pink-color-hand-drawn-design-object-logo-emblem-pictogram-254096277.jpg); */
        background-image: url(https://thumbs.dreamstime.com/b/vibrant-meccano-puzzle-kit-set-light-white-paper-backdrop-freehand-line-dark-black-color-ink-hand-drawn-design-object-logo-152473486.jpg);
         /* opacity: 70%; */
         display: flex;
        justify-content: center;
        align-items: center;
        padding: 80px 25px 120px;
        flex-direction: column;
        margin: 0px;
        /* border-radius: 0 0 50% 50%; */
    }
    
    .home-header-text {
        text-align: center;
        /* color: #fff; */
        font-family: Bahnschrift, SemiBold, SemiConden;
    }  
        .title {
            font-size: 100px;
            font-weight: bold;
            text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
            background-color: rgba(255, 255, 255, 0.8); ;

            color: #9681EB;
            padding: 30px;
            /* border-radius: 10% 10% 10% 10%; */

        }
            
        .tagline {
            font-size: 25px;
            color: #45CFDD;
            /* font-weight: 300; */
            text-shadow: -0.5px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;

        }
            
    .home-header-search {
        margin-top: 20px;          
    }
    .home-header-search input {
            width: 600px;
            max-width: 100%;
            border-radius: 300px;
            text-align: center;
            padding: 10px 20px;
            border: 2px solid rgb(59, 9, 106);
            &:focus {
                outline: none;
            }
              
    }
        

        
    

</style>
<header class="home-header">
    <div class="home-header-text">
        <h2 class="title">Welcome to Brick Kingdom</h2>
        <p class="tagline">Explore Our Collection Of Lego Sets and Pieces</p>
    </div>
    <div class="home-header-search">
        <input type="text" name="query" placeholder="Search">
    </div>
</header>