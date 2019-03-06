<?php 
interface iBook{
	public function getAllBook();
	public function deleteBook($tracker);
	public function getBookBy($tracker);
	public function getPassengers($tracker);
	public function selectBook($book_id);
	public function deleteBookByID($bid);
}