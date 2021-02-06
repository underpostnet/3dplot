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


  .scene {

    width: 50px;
    height: 50px;
    border: 2px solid red;
    perspective: 500px;

  }

  .cube_a {

    width: 50px;
    height: 50px;
    position: absolute;
    transform-style: preserve-3d;
    transform: rotateX(45deg) rotateY(45deg) rotateZ(0deg) translateX(0px) translateY(0px) translateZ(0px);
    border: 2px solid gray;

  }

  .cube_b {

    width: 50px;
    height: 50px;
    position: absolute;
    transform-style: preserve-3d;
    transform: rotateX(45deg) rotateY(45deg) rotateZ(0deg) translateX(50px) translateY(50px) translateZ(0px);
    border: 2px solid gray;

  }

  .cube_face {

    position: absolute;
    width: 50px;
    height: 50px;
    opacity: 0.5;

  }

  .face_front  { transform: rotateY(   0deg) translateZ(25px); }
  .face_back   { transform: rotateY(-180deg) translateZ(25px); }

  .face_left   { transform: rotateY(  90deg) translateZ(25px); }
  .face_right  { transform: rotateY( -90deg) translateZ(25px); }

  .face_top    { transform: rotateX( -90deg) translateZ(25px); }
  .face_bottom { transform: rotateX(  90deg) translateZ(25px); }

  </style>

</head>
<body>
  <script type="text/javascript">

  ((()=>{

    console.log('home init');

    append('body', `

    <div class='abs center scene'>

      <div class='cube_a'>

      <!-- ///////////////////////////////////////////// -->
      <!-- ///////////////////////////////////////////// -->

          <div class='cube_face face_front' style='background: yellow;' >

            <div class='abs center'>

              front

            </div>

          </div>

        <div class='cube_face face_back' style='background: yellow;' >

          <div class='abs center'>

            back

          </div>

        </div>

      <!-- ///////////////////////////////////////////// -->
      <!-- ///////////////////////////////////////////// -->

        <div class='cube_face face_left' style='background: green;'>

          <div class='abs center'>

            left

          </div>

        </div>

        <div class='cube_face face_right' style='background: green;'>

          <div class='abs center'>

            right

          </div>

        </div>

      <!-- ///////////////////////////////////////////// -->
      <!-- ///////////////////////////////////////////// -->

        <div class='cube_face face_top' style='background: orange;'>

          <div class='abs center'>

            top

          </div>

        </div>

        <div class='cube_face face_bottom' style='background: orange;'>

          <div class='abs center'>

            bottom

          </div>

        </div>

      <!-- ///////////////////////////////////////////// -->
      <!-- ///////////////////////////////////////////// -->

      </div>


      <div class='cube_b'>

      <!-- ///////////////////////////////////////////// -->
      <!-- ///////////////////////////////////////////// -->

          <div class='cube_face face_front' style='background: yellow;' >

            <div class='abs center'>

              front

            </div>

          </div>

        <div class='cube_face face_back' style='background: yellow;' >

          <div class='abs center'>

            back

          </div>

        </div>

      <!-- ///////////////////////////////////////////// -->
      <!-- ///////////////////////////////////////////// -->

        <div class='cube_face face_left' style='background: green;'>

          <div class='abs center'>

            left

          </div>

        </div>

        <div class='cube_face face_right' style='background: green;'>

          <div class='abs center'>

            right

          </div>

        </div>

      <!-- ///////////////////////////////////////////// -->
      <!-- ///////////////////////////////////////////// -->

        <div class='cube_face face_top' style='background: orange;'>

          <div class='abs center'>

            top

          </div>

        </div>

        <div class='cube_face face_bottom' style='background: orange;'>

          <div class='abs center'>

            bottom

          </div>

        </div>

      <!-- ///////////////////////////////////////////// -->
      <!-- ///////////////////////////////////////////// -->

      </div>

    </div>

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

  })());

  </script>

</body>

</html>
