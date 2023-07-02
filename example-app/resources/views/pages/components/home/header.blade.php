<style>
    .home-header {
        width: 100%;
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(205,42,171,1) 36%, rgba(0,212,255,1) 100%);padding: 100px 25px 120px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 100px 25px 120px;
        flex-direction: column;
        border-radius: 0 0 50% 50%;
    }
    
    .home-header-text {
        text-align: center;
        color: #fff;
    }  
        .title {
            font-size: 40px;
            font-weight: 700;
        }
            
        .tagline {
            font-size: 20px;
            font-weight: 300;
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
        <h2 class="title">Welcome to Furniture Home</h2>
        <p class="tagline">Explore Our Premium Collection Of Furniture</p>
    </div>
    <div class="home-header-search">
        <input type="text" name="query" placeholder="search your furniture...">
    </div>
</header>