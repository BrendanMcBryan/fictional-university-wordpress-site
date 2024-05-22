import './index.scss';
import {
  TextControl,
  Flex,
  FlexBlock,
  Button,
  Icon,
  FlexItem,
} from '@wordpress/components';

wp.blocks.registerBlockType('ourplugin/are-you-paying-attention', {
  title: 'Are You Paying Attention?',
  icon: 'smiley',
  category: 'common',
  attributes: {
    // skyColor: { type: 'string', source: 'text', selector: '.skyColor' }, How to store data in HTML instead of comment
    skyColor: { type: 'string' },
    grassColor: { type: 'string' },
  },
  edit: EditComponent,
  save: function () {
    return null;
  },
});

function EditComponent(props) {
  function updateSkyColor(event) {
    props.setAttributes({ skyColor: event.target.value });
  }

  function updateGrassColor(event) {
    props.setAttributes({ grassColor: event.target.value });
  }

  return (
    <div className="paying-attention-edit-block">
      <TextControl label="Question: " style={{ fontSize: '20px' }} />
      <p style={{ fontSize: '13px', margin: '20px 0 8px 0' }}>Answers:</p>
      <Flex>
        <FlexBlock>
          <TextControl />
        </FlexBlock>
        <FlexItem>
          <Button>
            <Icon className="mark-as-correct" icon="star-empty" />
          </Button>
        </FlexItem>
        <FlexItem>
          <Button variant="link" className="attention-delete">
            Delete
          </Button>
        </FlexItem>
      </Flex>
      <Button variant="primary">Add another Answer</Button>
    </div>
  );
}
