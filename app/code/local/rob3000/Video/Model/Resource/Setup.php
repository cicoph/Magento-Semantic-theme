<?php
/**
 * Add category attribute
 *
 * @author      Lucas van Staden
 */
class Doghouse_Video_Model_Resource_Setup extends Mage_Catalog_Model_Resource_Setup {

    private $_category_attributes = array(
            'catalog_video' => array(
              'label' => 'Youtube Url',
              'type' => 'varchar',
              'input' => 'text',
              'source' => '',
              'default' => '',
              'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
              'visible' => true,
              'required' => true,
              'user_defined' => false,
              'visible_on_front' => true,
              'used_in_product_listing' => true,
              'note' => 'The link from youtube.'
            ),
            'catalog_video_description' => array(
              'label' => 'Youtube Url',
              'type' => 'varchar',
              'input' => 'textarea',
              'source' => '',
              'default' => '',
              'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
              'visible' => true,
              'required' => true,
              'user_defined' => false,
              'visible_on_front' => true,
              'used_in_product_listing' => true,
              'note' => 'A Description about the Video'
            )

    );

	public function getDefaultEntities() {
		$entities = array();

		$default_attribute_options = array(
			'group'		=> 'General Information',
			'required'	=> false,
		);

		/* Build Catalog Attributes */
		$entities['catalog_category'] = array(
			'entity_model'		=> 'catalog/category',
			'attribute_model'	=> 'catalog/resource_eav_attribute',
			'table'				=> 'catalog/category',
			'additional_attribute_table' => 'catalog/eav_attribute',
			'entity_attribute_collection' => 'catalog/category_attribute_collection',
			'attributes'		=> array(),
		);
		foreach ($this->_category_attributes as $name => $options) {
			/* Override values provided by the defaults */
			$attribute_options = $default_attribute_options;
			foreach ($options as $k => $v) {
				$attribute_options[$k] = $v;
			}
			$entities['catalog_category']['attributes'][$name] = $attribute_options;
		}

		return $entities;
	}

}
?>
