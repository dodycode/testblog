<style type="text/css">
	a{
		transition: all .2s ease-in-out;
	}

  a:hover{
    text-decoration: none;
  }

	.navbar-default{
		transition: all .2s ease-in-out;
		background-color: transparent;
		border-color: transparent;
	}

	.navbar-custom-berwarna{
		background-color: rgba(255,255,255,.98);
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
	}

	.header-style{
		margin-bottom: 20px;
		background: url('{{ asset('img/header-img.jpg') }}') fixed no-repeat center center;
		background-size: cover;
		position: relative;
		height: 700px;
	}

  .h2-style{
    margin-bottom: 50px;
    font-family: 'Patua One', sans-serif;
    position: relative;
    font-size: 30px;
  }

  .h2-style::before{
    content: "";
    position: absolute;
    height: 20px;
    border-bottom: 3px solid #222;
    top: 0;
    width: 150px;
    overflow: hidden;
    right: 58%;
  }

  .h2-style::after{
    content: "";
    position: absolute;
    height: 20px;
    border-bottom: 3px solid #222;
    top: 0;
    width: 160px;
    overflow: hidden;
    left: 58%;
  }

	.navbar-default .navbar-nav > li a{
		font-size: 16px;
		font-weight: 600;
		text-transform: uppercase;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		border: none;
		color: rgba(255,255,255,.8);
		transition: all .2s ease-in-out;
	}

	.navbar-default .navbar-nav > li a:hover{
		color: #fff;
	}

	.container-fluid.layer{
		padding-left: 0 !important;
		padding-right: 0 !important;
		margin-left: -15px;
		margin-right: -15px;
		height:100%;
		background-color: rgba(0, 0, 0, 0.4);
	}

	.header-text{
		margin-top: 280px;
		font-size: 65px;
		font-weight: 800;
		font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		color: rgba(255,255,255,.8);
	}

	hr.small{
		max-width: 100px;
		border-width: 4px;
		margin: 2% auto;
		border-color: rgba(255,255,255,.8);
	}

	.card *:hover{
      text-decoration: none;
  	}

  	.card .thumbnail{
      padding: 0;
      border: none;
      text-align: center;
      border-radius: 0;
      -webkit-box-shadow: 0px 0.5px 1px 0px rgba(0,0,0,0.75);
      -moz-box-shadow: 0px 0.5px 1px 0px rgba(0,0,0,0.75);
      box-shadow: 0px 0.5px 1px 0px rgba(0,0,0,0.75);
  	}

  	.img-wrapper{	
  		display: inline-block;
		overflow: hidden;
  	}

  	.thumbnail .img-wrapper a img{
	  	-webkit-transition: all .5s ease;
	    -moz-transition: all .5s ease;
	    -ms-transition: all .5s ease;
	    -o-transition: all .5s ease;
	    transition: all .5s ease;
	    vertical-align: middle;
		height: 400px;
	    width: 100%;
  	}

	.thumbnail .img-wrapper a:hover img{
	  	transform:scale(1.2);
	    -ms-transform:scale(1.2); /* IE 9 */
	    -moz-transform:scale(1.2); /* Firefox */
	    -webkit-transform:scale(1.2); /* Safari and Chrome */
	    -o-transform:scale(1.2); /* Opera */
		opacity: .8;
	}

  	.card .thumbnail .caption{
      margin: -20px 20px 20px 20px;
      padding: 19px 29px 19px 29px;
      position: relative;
      background-color: #fff;
  	}

  	.card .thumbnail .caption h5 small{
      font-style: italic;
      text-transform: none;
      letter-spacing: 0;
      font-weight: 400;
      font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
      display: block;
      padding: 5px;
  	}

  	.card .thumbnail .caption h5{
      font-family: 'Raleway',sans-serif; 
      font-weight: 600;
      letter-spacing: -1px;
      margin-top: 0;
      text-transform: uppercase;
      font-size: 14px;
  	}

  	.card .thumbnail .caption h5 > a{
      color: black;
  	}

  	.card .thumbnail .caption hr{
      border-top: 1px solid #333;
      margin: 20px 40px;
  	}

  	.card .thumbnail .caption p{
      font-size: 12px;
      line-height: 1.6;
  	}

  	.card .thumbnail .caption button{
      border-radius: 0;
      color: #eee;
      -moz-transition: 0.3s;
      -webkit-transition: 0.3s;
      -o-transition: 0.3s;
      transition: 0.3s;
  	}

  	.card .thumbnail .caption button:hover{
      background-color: #0ce3ac;
      border-color: #0ce3ac;
      color: #eee;
      -moz-transition: 0.3s;
      -webkit-transition: 0.3s;
      -o-transition: 0.3s;
      transition: 0.3s;
  	}

  	.visible-mobile-ipad{
  		display: none;
  	}

  	.visible-mobile{
  		display: none;
  	}

    .separator embed{
      width: 100% !important;
      height: 100% !important;
    }

    @media (min-width: 1024px) and (max-width: 1024px) and (orientation:portrait) {
      .thumbnail .img-wrapper a img{
        height: auto;
      }
    }

     @media (min-width: 1024px) and (max-width: 1024px) and (orientation:landscape) {
      .thumbnail .img-wrapper a img{
        height: auto;
      }
     }

  	@media (min-width: 768px) and (max-width: 768px){
  		.header-text{
  			font-size: 57px;
  			margin-top: 212px;
  		}

  		.visible-mobile-ipad{
  			display: block;
  		}

      .header-style{
        height: 600px;
      }

      .thumbnail .img-wrapper a img{
        height: auto;
      }

      .separator img{
        width: 100%;
        height: auto;
      }

      p img{
        width: 100%;
        height: auto;
      }

      .separator object embed{
        width: 100% !important;
        height: 100% !important;
      }

      .h2-style{
        display: none;
      }
  	}

  	@media(max-width: 750px){
  		.navbar-default .navbar-brand{
  			color: black;
  		}

  		.visible-mobile-ipad{
  			display: block;
  		}

  		.visible-mobile{
  			display: block;
  		}

  		.navbar-custom-berwarna{
  			background-color: #fff !important;
  			border-color: #ddd !important;
  		}

  		.navbar-default{
  			background-color: #fff !important;
  			border-color: #ddd !important;
  		}

  		.navbar-default .navbar-nav > li a{
  			color: black !important;
  			text-align: center;
  			margin-bottom: 2%;
  		}

  		.navbar-default .navbar-nav > li a:hover{
  			color: #4582ec !important;
  		}

      .header-style{
        height: 500px;
      }

  		.header-text{
  			margin-top: 268px;
  			font-size: 36px;
  		}

      .thumbnail .img-wrapper a img{
        height: auto;
      }

      .separator img{
        width: 100%;
        height: auto;
      }

      p img{
        width: 100%;
        height: auto;
      }

      .separator embed{
        width: 100% !important;
        height: 100% !important;
      }

      .h2-style{
        display: none;
      }
  	}

  	@media (min-width: 360px) and (max-width: 360px){
  		.header-text{
  			margin-top: 260px;
  			font-size: 33px;
  		}
  	}

    @media (min-width: 320px) and (max-width: 320px){
      .header-style{
        height: 568px;
      }
    }
</style>