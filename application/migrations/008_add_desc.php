<?php
class Migration_Add_desc extends CI_Migration {

	public function up()
	{
		$fields = (array(
			'file_caption' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
      'file_desc' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
			),
		));
		$this->dbforge->add_column('carousel', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('carousel', $fields );

	}
}
