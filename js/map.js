

if ($('#audience-map').length) {

  fetch('/../proyectos/visitas_map/get_visitas_map.php')
    .then(function (r) { return r.json(); })
    .then(function (data) {
      var values = {};

      data.forEach(function (item) {
        values[item.code.toUpperCase()] = item.value;
      });

      $('#audience-map').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        panOnDrag: true,
        focusOn: {
          x: 0.5,
          y: 0.5,
          scale: 1,
          animate: true
        },
        regionStyle: {
          initial: {
            fill: '#e0f2ff'
          }
        },
        series: {
          regions: [{
            scale: ['#a8d8ff', '#1e88e5'],
            normalizeFunction: 'polynomial',
            values: values
          }]
        }
      });
    })
    .catch(function (e) {
      console.error('Error cargando datos del mapa:', e);
    });

}

