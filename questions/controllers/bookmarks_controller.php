<?php
class BookmarksController extends AppController {
	var $name = 'Bookmarks';
    
    function add_bookmark( $content_id, $content_type = CONTENT_QUESTION ) {
        $this->Bookmark->create();
        echo $this->Bookmark->save( array ( 'Bookmark' => array( 
            'user_id' => $this->Auth->user('id'),
            'content_id' => $content_id,
            'content_type' => $content_type
        ) ) )
            ? '1'
            : 0;
        exit();
    }
    
    function remove_bookmark( $content_id, $content_type = CONTENT_QUESTION ) {
        $this->Bookmark->recursive = -1;
        $bookmark = $this->Bookmark->findByContentIdAndContentType( $content_id, $content_type );
        echo $this->Bookmark->delete( $bookmark['Bookmark']['id'] ) ? '1' : 0 ;
        exit();
    }
}
