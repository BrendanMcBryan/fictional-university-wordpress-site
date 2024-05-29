wp.blocks.registerBlockType('ourblocktheme/eventsandblogs', {
  title: 'Events & Blogs',
  supports: {
    align: ['full'],
  },

  edit: function () {
    return wp.element.createElement(
      'div',
      { className: 'our-placeholder-block' },
      'Events & Blogs Placeholder'
    );
  },
  save: function () {
    return null;
  },
});
