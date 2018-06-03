<?php
class Migration_add_carousel extends CI_Migration {

	public function up(){
		$fields = (array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
			'filename' => array(
				'type' => 'VARCHAR',
				'constraint' => '500',
			),
      'file_ext' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
			),

		));

		$this->dbforge->add_field($fields);
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('carousel');
	}

	public function down(){
		$this->dbforge->drop_table('carousel');
	}
}
