wp.blocks.registerBlockType('ourplugin/are-you-paying-attention', {
  title: 'Are You Paying Attention?',
  icon: 'smiley',
  category: 'common',
  attributes: {
    // skyColor: { type: 'string', source: 'text', selector: '.skyColor' }, How to store data in HTML instead of comment
    skyColor: { type: 'string' },
    grassColor: { type: 'string' },
  },
  edit: function (props) {
    function updateSkyColor(event) {
      props.setAttributes({ skyColor: event.target.value });
    }

    function updateGrassColor(event) {
      props.setAttributes({ grassColor: event.target.value });
    }

    return (
      <div>
        <input
          type="text"
          name=""
          id=""
          placeholder="Sky Color"
          value={props.attributes.skyColor}
          onChange={updateSkyColor}
        />
        <input
          type="text"
          name=""
          id=""
          placeholder="Grass Color"
          value={props.attributes.grassColor}
          onChange={updateGrassColor}
        />
      </div>
    );
  },
  save: function (props) {
    return (
      <p>
        Today the Sky is{' '}
        <span className="skyColor">{props.attributes.skyColor}</span> and the
        Grass is
        <span className="grassColor">{props.attributes.grassColor}</span>
      </p>
    );
  },
});
