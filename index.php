<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="gb18030"><meta name='title' content='3D Plot Demo - underpost.net' />

  <meta name='viewport' content='initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>

  <meta name='viewport' content='width=device-width, user-scalable=no' />

  <meta name='description' content='3D Plot Demo - UNDERpost.net' />

  <link rel='canonical' href='https://underpost.net/3dplotdemo' />

  <meta property='og:title' content='3D Plot Demo' />

  <meta property='og:image' content='https://underpost.net/assets/underpost-social.jpg' />

  <meta property='og:url' content='https://underpost.net/3dplotdemo' />

  <meta name='twitter:card' content='summary_large_image' />

  <link rel='icon' type='image/png' href='https://underpost.net/assets/underpost.png' />

  <title>3D Plot Demo - underpost.net</title>
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


  a  {

    color: white;
    text-decoration: none;
    transition: .3s;

  }

  a:hover {

    color: red;

  }

  .fix-content {

    text-align: center;
    padding: 5px;
    width: 300px;
    margin: auto;
    transform: translate(-50%, 0);
    left: 50%;
    font-size: 18px;
    font-weight: bold;

  }


  </style>

</head>
<body>
  <script type="text/javascript">

  ((()=>{

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

        /*if(data.lastW>=data.lastH){

          s('grids').style.height = data.lastH+'px';
          s('grids').style.width = data.lastH+'px';

        }else{

          s('grids').style.height = data.lastW+'px';
          s('grids').style.width = data.lastW+'px';

        }*/

        s('grids').style.height = '100%';
        s('grids').style.width = '100%';

        //--------------------------------------------------------------------------
        //--------------------------------------------------------------------------

      }

    }

    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------

    var mod_plot = {

      dim: null,
      dimCube: null,
      arrayCube: [],
      init: function(dim){

        this.dim = dim;
        this.dimCube = 100/dim;

        append('body', `

        <grids class='abs center' style='background: #1b1b1b; overflow: hidden;'>



        </grids>

        <div class='fix fix-content' style='top: 5px;'>

        3D PLOT FRAMEWORK

        </div>

        <div class='fix fix-content' style='bottom: 5px;'>

        <a target='_blank' href='https://github.com/underpostnet/3dplot'>

        Git

        </a>

        |

        <a href='https://underpost.net/'>

        Powered by UNDERpost.net

        </a>

        </div>

        `);

      },
      appendCube: function(x, y, type_){

        for(val of this.type){

          if(val.name==type_){

            let px_dim = (s('grids').clientWidth/this.dim)*val.sizeFactor;

            append('grids', `

            <div class='abs scene scene-`+x+`-`+y+`' style='

            border: `+val.sceneBorder+`;
            width: `+this.dimCube+`%;
            height: `+this.dimCube+`%;
            background: `+val.sceneBackground+`;
            left: `+((x-1)*this.dimCube)+`%;
            top: `+((y-1)*this.dimCube)+`%;
            perspective: `+val.perspective+`px;
            transition: `+val.transition+`s;

            '>

            <style>

            .cube_`+val.name+`_`+x+`_`+y+` {

              width: `+px_dim+`px;
              height: `+px_dim+`px;
              position: absolute;
              transform-style: preserve-3d;
              transform: rotateX(`+val.cr[0]+`deg) rotateY(`+val.cr[1]+`deg) rotateZ(`+val.cr[2]+`deg) translateX(`+val.ct[0]+`px) translateY(`+val.ct[1]+`px) translateZ(`+val.ct[2]+`px);
              border: `+val.cubeBorder+`;
              background: `+val.cubeBackground+`;
              transition: `+val.transition+`s;

            }

            .cube_face_`+x+`_`+y+` {

              position: absolute;
              width: 100%;
              height: 100%;
              opacity: `+val.opacity+`;
              border: `+val.cubeFaceBorder+`

            }

            .face_front_`+x+`_`+y+`  { transform: rotateY(   0deg) translateZ(`+(px_dim/2)+`px); background: `+val.background_front+`; }
            .face_back_`+x+`_`+y+`   { transform: rotateY(-180deg) translateZ(`+(px_dim/2)+`px); background: `+val.background_back+`; }

            .face_left_`+x+`_`+y+`   { transform: rotateY(  90deg) translateZ(`+(px_dim/2)+`px); background: `+val.background_left+`; }
            .face_right_`+x+`_`+y+`  { transform: rotateY( -90deg) translateZ(`+(px_dim/2)+`px); background: `+val.background_rigth+`; }

            .face_top_`+x+`_`+y+`    { transform: rotateX( -90deg) translateZ(`+(px_dim/2)+`px); background: `+val.background_top+`; }
            .face_bottom_`+x+`_`+y+` { transform: rotateX(  90deg) translateZ(`+(px_dim/2)+`px); background: `+val.background_bottom+`; }

            </style>

            <div class='cube_`+val.name+`_`+x+`_`+y+`'>

            <div class='cube_face_`+x+`_`+y+` face_back_`+x+`_`+y+`'>

            </div>

            <div class='cube_face_`+x+`_`+y+` face_front_`+x+`_`+y+`'>

            </div>

            <div class='cube_face_`+x+`_`+y+` face_left_`+x+`_`+y+`'>

            </div>

            <div class='cube_face_`+x+`_`+y+` face_right_`+x+`_`+y+`'>

            </div>

            <div class='cube_face_`+x+`_`+y+` face_top_`+x+`_`+y+`'>

            </div>

            <div class='cube_face_`+x+`_`+y+` face_bottom_`+x+`_`+y+`'>

            </div>

            </div>

            </div>

            `);

          }

        }

      },
      type: [

        {
          name: 'test',
          sceneBorder: '0px solid red',
          sceneBackground: 'none',
          perspective: 10000,
          sizeFactor: 0.3,
          cr: [45, 45, 45],
          ct: [0, 0, 0],
          cubeBorder: '0px solid white',
          cubeBackground: 'none',
          opacity: 0.5,
          transition: 10,
          background_top: 'yellow',
          background_bottom: 'yellow',
          background_left: 'red',
          background_rigth: 'red',
          background_front: 'blue',
          background_back: 'blue',
          cubeFaceBorder: '0px solid green'
        }

      ],
      animated: function(time){

        // async -> paralelo
        // await -> serie

        async function update(val, time){

          setTimeout(()=>{

            let dif_rotate = 50;

            val[3][0]=val[3][0]+random((-1*dif_rotate), (dif_rotate));
            val[3][1]=val[3][1]+random((-1*dif_rotate), (dif_rotate));
            val[3][2]=val[3][2]+random((-1*dif_rotate), (dif_rotate));

            let dif_translate = 0;

            val[4][0]=val[4][0]+random((-1*dif_translate), (dif_translate));
            val[4][1]=val[4][1]+random((-1*dif_translate), (dif_translate));
            val[4][2]=val[4][2]+random((-1*dif_translate), (dif_translate));

            s((`.cube_`+val[2]+`_`+val[0]+`_`+val[1])).style.transform = `
            rotateX(`+val[3][0]+`deg)
            rotateY(`+val[3][1]+`deg)
            rotateZ(`+val[3][2]+`deg)
            translateX(`+val[4][0]+`px)
            translateY(`+val[4][1]+`px)
            translateZ(`+val[4][2]+`px)
            `;

            let dif_pos_min = -50;
            let dif_pos_max = 150;

            s(`.scene-`+val[0]+`-`+val[1]).style.left = random(dif_pos_min, dif_pos_max)+'%';
            s(`.scene-`+val[0]+`-`+val[1]).style.top = random(dif_pos_min, dif_pos_max)+'%';

          }, time);

        }

        setInterval(()=>{

          for(val of mod_plot.arrayCube){

            update(val, random(0, 5000));

          }

        }, time);

      },
      allTest: function(dim, name, time){

        let cr;
        let ct;
        for(val of this.type){

          if(val.name==name){

            cr = val.cr;
            ct = val.ct;

          }

        }

        this.init(dim);

        for(var i=1;i<=dim;i++){

          for(var ii=1;ii<=dim;ii++){

            this.appendCube(i, ii, name);
            this.arrayCube.push([i, ii, name, cr, ct]);

          }

        }

        this.animated(time);

        console.log('create plot');
        console.log(this.arrayCube);

      }

    };

    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------

    const dim = 6;
    const name = 'test';
    const time = 1000;

    mod_plot.allTest(dim, name, time);

    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------

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
