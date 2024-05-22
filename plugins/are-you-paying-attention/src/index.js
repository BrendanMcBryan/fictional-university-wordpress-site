wp.blocks.registerBlockType('ourplugin/are-you-paying-attention', {
  title: 'Are You Paying Attention?',
  icon: 'smiley',
  category: 'common',
  edit: function () {
    return (
      <div>
        <h3>This is an h3 from JSX homie. </h3>
      </div>
    );
  },
  save: function () {
    return wp.element.createElement('h1', null, 'This is front.');
  },
});
