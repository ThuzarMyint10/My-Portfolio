<?php

class Posts extends Collection implements TrackableInterface, ShareableInterface
{
    public function setEntity(){
        $this->entity = 'posts';
    }

    public function getTitle()
    {
        if ($this->count() === 1) {
            return $this->current()->title;
        }
        return 'Latest Posts';
    }

    public function getAuthor()
    {
     
        $users = $this->repo->find('users', $this->current()->author)[0];
        if (empty($users->name)){
            return 'Unknown';
        }
        return $users->name;
    }
    public function getDateTime($format = 'D, d M Y H:i:s')
    {
        $date = new DateTime($this->current()->dateTime);
        return $date->format($format);
    }
    public function getEndDateTime($format = 'D, d M Y H:i:s')
    {
        $date = new DateTime($this->current()->dateTime);
        return $date->format($format);
    }
    public function shareTwitter(){
        return 'subject=' . urlencode($this->current()->title)
                . '&body=' . urlencode($this->shortDescription() . "\n\nRead more at ")
                . 'http://'
                . $_SERVER['HTTP_HOST']
                .$_SERVER['REQUEST_URI'];
    }
    public function shareFacebook()
    {
        return 'http://'
                . $_SERVER['HTTP_HOST']
                .$_SERVER['REQUEST_URI'];
    }
    public function shareEmail()
    {
        return 'http://'
                . $_SERVER['HTTP_HOST']
                .$_SERVER['REQUEST_URI'];
    }
}