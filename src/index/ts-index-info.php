<!DOCTYPE html>
<html>
   
   <head>
      <meta charset="utf-8">
      <title>ThreeScript</title>
      <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
      <link href='/master/ThreeScriptTools/src/index/css/ts-info.css' rel='stylesheet'>
   </head>
   
   <body>
      
      <section>
         <h1>ThreeScript</h1>
         <footer>3D Script Plugin & Editor</footer>
      </section>

      <section>
         <p>
            ThreeScript is an opensource 3D script plugin and editor,
            to you create virtual reality scenes and embbed them into your
            html pages.
         </p>
      </section>

      <section>
         <h3>3D Components</h3>
         <ul class="incremental">
            <li>scene;
            <li>cameras;
            <li>renderers;
            <li>lights;
            <li>geometries;
            <li>materials;
            <li>meshes.
         </ul>
      </section>

      <section>
         <h2>Scene, cameras and renderers</h2>
      </section>

      <section>
         <h3>Cameras</h3>
         <ul class="incremental">
            <li>Cameras film the scene.
            <li>There are 3 types of cameras:
               <ul class="incremental">
                  <li> perspective camera;
                  <li> ortographic camera;
                  <li> cubic camera.
               </ul>
         </ul>
      </section>

      <section>
         <h3>Renderer</h3>
         <ul class="incremental">
            <li>Renderers are used to make the output of the scene filmed by the camera.
            <li>There are 2 types of renderer:
               <ul class="incremental">
                  <li> webgl renderer;
                  <li> canvas renderer.
               </ul>
         </ul>
      </section>

      <section>
         <h2>Geometries, Materials and Meshes!</h2>
      </section>

      <section>
         <h3>Geometries</h3>
         <ul class="incremental">
            <li>Geometries are used this the materials in the meshes of the scene.
            <li>There are several geometries 2D and 3D, some:
               <ul class="incremental">
                  <li> plan;
                  <li> circle;
                  <li> box;
                  <li> sphere;
                  <li> torus;
                  <li> ring;
                  <li> poolyedron.
               </ul>
         </ul>
      </section>

      <section>
         <h3>Materials</h3>
         <ul class="incremental">
            <li>Materials are the 'skin' used over the geometries in the composition of the meshes.
            <li>Some materials.
               <ul class="incremental">
                  <li> basic;
                  <li> Lambert;
                  <li> Phong;
                  <li> face.
               </ul>
         </ul>
      </section>

      <!--section>
         <figure> <!-- Figures are used to display images and videos fullpage -- >
            <img src="http://placekitten.com/g/800/600">
            <figcaption>Perspective camera</figcaption>
         </figure>
         <div role="note">natural view of the scene.</div>
      </section>

      <section>
         <figure> <!-- Videos are automatically played -- >
            <video src="http://videos-cdn.mozilla.net/brand/Mozilla_Firefox_Manifesto_v0.2_640.webm" poster="http://www.mozilla.org/images/about/poster.jpg"></video>
            <figcaption>Ortographic camera</figcaption>
         </figure>
      </section-->

      <section>
         <h2>End!</h2>
      </section>

      <div id="progress-bar"></div>
      <script type="text/javascript" src="/master/ThreeScriptTools/src/index/js/ts-dz.js"></script>
   </body>
</html>
<!-- vim: set fdm=marker: }}} -->
