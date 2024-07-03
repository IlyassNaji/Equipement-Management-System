<x-app-layout>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Map</title>
  <!-- Assuming the correct path to your CSS file -->
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <h1>Company</h1>
  <div id="map"></div>
  <button id="retour-btn">Back</button>

  <script>
    function addBatiment() {
      const map = document.getElementById('map');
      let batiment = ""; // Store selected building
      let etage = ""; // Store selected floor

      // Assuming correct image paths
      const etageImgSrc = "{{ asset('css/etage.png') }}";
      const AimgSrc = '{{ asset("css/batiment.png") }}';
      const BureauImgSrc = '{{ asset("css/bureau.png") }}';

      const createBureauButtons = function() {
        const bureauGrid = document.createElement('div');
        bureauGrid.classList.add('bureaux');
        
        for (let i = 1; i <= 8; i++) {
          const bureauContainer = document.createElement('div');
          bureauContainer.classList.add('bureau-container');

          const bureauImg = document.createElement('img');
          bureauImg.classList.add('bureau-img');
          bureauImg.src = BureauImgSrc;
          bureauImg.alt = '' + i;

          const bureauDesc = document.createElement('p');
          bureauDesc.textContent = 'Bureau ' + i;

          bureauContainer.appendChild(bureauImg);
          bureauContainer.appendChild(bureauDesc);

          bureauContainer.addEventListener('click', () => {
            let bureau = bureauImg.alt;
            let data = batiment + etage + bureau;
            console.log(data);
            submitForm(data);
          });

          bureauGrid.appendChild(bureauContainer);
        }

        map.appendChild(bureauGrid);
        activateRetourButton();
      };

      const createEtageButtons = function() {
        const etageGrid = document.createElement('div');
        etageGrid.classList.add('etages');
        
        for (let i = 1; i <= 6; i++) {
          const etageContainer = document.createElement('div');
          etageContainer.classList.add('etage-container');

          const etageImg = document.createElement('img');
          etageImg.classList.add('etage-img');
          etageImg.src = etageImgSrc;
          etageImg.alt = '' + i;

          const etageDesc = document.createElement('p');
          etageDesc.textContent = 'Étage ' + i;

          etageContainer.appendChild(etageImg);
          etageContainer.appendChild(etageDesc);

          etageContainer.addEventListener('click', () => {
            etage = etageImg.alt;
            const batimentContainers = document.querySelectorAll('.batiment-container');
            batimentContainers.forEach(container => container.remove());
            const bureauGrid = document.querySelector('.bureaux');
            if (bureauGrid) bureauGrid.remove();
            createBureauButtons();
          });

          etageGrid.appendChild(etageContainer);
        }

        map.appendChild(etageGrid);
        activateRetourButton();
      };

      const createBatimentButtons = function() {
        const batiment1Container = document.createElement('div');
        batiment1Container.classList.add('batiment-container');

        const batiment1Img = document.createElement('img');
        batiment1Img.classList.add('batiment-img');
        batiment1Img.src = AimgSrc;
        batiment1Img.alt = 'A';

        const batiment1Desc = document.createElement('p');
        batiment1Desc.textContent = 'Batiment A';

        batiment1Container.appendChild(batiment1Img);
        batiment1Container.appendChild(batiment1Desc);

        batiment1Container.addEventListener('click', () => {
          batiment = 'A';
          const batimentContainers = document.querySelectorAll('.batiment-container');
          batimentContainers.forEach(container => container.remove());
          createEtageButtons();
        });

        const batiment2Container = document.createElement('div');
        batiment2Container.classList.add('batiment-container');

        const batiment2Img = document.createElement('img');
        batiment2Img.classList.add('batiment-img');
        batiment2Img.src = AimgSrc;
        batiment2Img.alt = 'Building B';

        const batiment2Desc = document.createElement('p');
        batiment2Desc.textContent = 'Batiment B';

        batiment2Container.appendChild(batiment2Img);
        batiment2Container.appendChild(batiment2Desc);

        batiment2Container.addEventListener('click', () => {
          batiment = 'B';
          const batimentContainers = document.querySelectorAll('.batiment-container');
          batimentContainers.forEach(container => container.remove());
          createEtageButtons();
        });

        const grid = document.createElement('div');
        grid.classList.add('batiments');
        grid.appendChild(batiment1Container);
        grid.appendChild(batiment2Container);
        map.appendChild(grid);
        activateRetourButton();
      };

      const activateRetourButton = function() {
        const retourBtn = document.getElementById('retour-btn');
        retourBtn.addEventListener('click', () => {
          const batimentContainers = document.querySelectorAll('.batiment-container');
          batimentContainers.forEach(container => container.remove());
          const etageGrid = document.querySelector('.etages');
          if (etageGrid) etageGrid.remove();
          const bureauGrid = document.querySelector('.bureaux');
          if (bureauGrid) bureauGrid.remove();
          createBatimentButtons();
        });
      };
      function submitForm(data) {
  const map = document.getElementById('map');   
  const form = document.createElement('form'); 
  form.id = 'myForm';
  form.method = 'GET';
  form.action = '{{ route("equipement.place", ":data") }}'.replace(':data', data);
  map.appendChild(form); 
  form.submit(); 
}




      createBatimentButtons();
    }

    addBatiment(); // Call the function to initialize the map
  </script>
</body>
</html>

</x-app-layout>