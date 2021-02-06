<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>test</title>
  <meta name='viewport' content='initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
  <meta name='viewport' content='width=device-width, user-scalable=no' />
  <script>
  <?php

  $path = 'c:/dd/deploy_area/client';

  echo file_get_contents($path.'/vanilla.js');
  echo file_get_contents($path.'/util.js');

  ?>
  </script>


  <style>
  <?php

  echo file_get_contents($path.'/style/underpost.css');

  ?>
  </style>

  <style>

  .parent {

    background: gray;
    width: 200px;
    height: 200px;
    margin: auto;

  }

  .child  {

    width: 100px;
    height: 100px;
    margin: auto;

  }

  </style>

</head>
<body>
  <script type="text/javascript">


  var stop = false;

  ((()=>{

    console.log('home init');

    append('body', `

    <br>

    <div class='in' style='text-align: center;'>

    3D PLOT

    </div>

    <br>

    <div class='in parent'>

    </div>

    `);

    function rr(){

      if( (data.lastW!=s('body').clientWidth) || (data.lastH!=s('body').clientHeight) ){

        data.lastW=s('body').clientWidth;
        data.lastH=s('body').clientHeight;

        if(data.lastW>500){

          data.movil = false;

        }else{

          data.movil = true;

        }

        console.log('movil -> '+data.movil);

        //--------------------------------------------------------------------------
        //--------------------------------------------------------------------------



        //--------------------------------------------------------------------------
        //--------------------------------------------------------------------------

      }

    }

    var data = {

      movil: false,
      lastH: null,
      lastW: null

    };
    rr();
    setInterval(function(e){
      rr();
    }, 100);

    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------


    var mod_plot = {

      childs: [
        {
          top: 50,
          left: 20,
          x: 0,
          y: 45,
          z: 0,
          content: 'A',
          background: 'red'
        },
        {
          top: 50,
          left: 80,
          x: 0,
          y: 45,
          z: 0,
          content: 'B',
          background: 'blue'
        }
      ],
      init: function(){

        let index = 0;
        for(val of this.childs){

          append('.parent', `

          <div class='abs center' style='left: `+val.left+`%; top: `+val.top+`%;'>

            <div

            class='in child child-`+index+`'

            style='
            background: `+val.background+`;
            transform: rotateY(`+val.y+`deg) rotateX(`+val.x+`deg) rotateZ(`+val.z+`deg);
            border-top: 4px solid white;
            border-left: 4px solid white;

            '>

              <div class='abs center'>

                `+val.content+`

              </div>

            </div>

          </div>

          `);

          index++;

        }

      },
      animated: function(){

        const timer = ms => new Promise(res => setTimeout(res, ms));
        let index = 0;


        function limit(val){

          if(val.x > 360){
            val.x = 0;
          }
          if(val.y > 360){
            val.y = 0;
          }
          if(val.z > 360){
            val.z = 0;
          }


          if(val.x < 0){
            val.x = 360;
          }
          if(val.y < 0){
            val.y = 360;
          }
          if(val.z < 0){
            val.z = 360;
          }

          return val;

        }

        async function loop(time){

          while(true){

            // console.log('frame ->'+index);

            await timer(time);
            index++;

            //------------------------------------------------------------------
            //------------------------------------------------------------------

            // rotateY(`+val.y+`deg) rotateX(`+val.x+`deg) rotateZ(`+val.z+`deg)
            let id = 0;
            for(val of mod_plot.childs){

              val.x = val.x + random(1, 3);
              val.y = val.y + random(1, 3);
              val.z = val.z + random(1, 3);

              limit(val);

              s('.child-'+id).style.transform = `rotateY(`+val.y+`deg) rotateX(`+val.x+`deg) rotateZ(`+val.z+`deg)`;
              id++;

            }

            if(stop){
              break;
            }

            //------------------------------------------------------------------
            //------------------------------------------------------------------

          }

        };

        loop(15);

      }

    };

    mod_plot.init();
    mod_plot.animated();



    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------

  })());

  </script>

</body>

</html>
