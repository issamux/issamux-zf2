<?php
namespace Media\Model;

use Zend\Db\TableGateway\TableGateway;

class MediaTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		/*for paginator*/
		$resultSet->buffer();
		$resultSet->next();
		return $resultSet;
	}

	public function getMedia($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function saveAlbum(Media $media)
	{
		$data = array(
				'author' => $media->author,
				'title'  => $media->title,
				'description' => $media->description,
				'data' => $media->data
		);

		$id = (int)$media->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getAlbum($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}

	public function deleteAlbum($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}
}