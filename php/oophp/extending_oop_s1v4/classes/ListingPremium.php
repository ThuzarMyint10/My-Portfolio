<?php

class ListingPremium extends ListingBasic
{
    protected $description;
    protected $status = 'premium';
    protected static $allowed_tags = '<p><br><b><strong><em><u><ol><ul><li>';

    public function setValues($data = []) {
        parent::setValues($data);
        if (isset($data['description'])) {
            $this->setDescription($data['description']);
        }
    }
    /**
     * Gets the local property $description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Cleans up and sets the local property $description
     * @param string $value to set property
     */
    public function setDescription($value)
    {
        $this->description = trim(strip_tags($value, self::$allowed_tags));
    }

    public static function dispalyAllowedTags(){
        return htmlspecialchars(self::$allowed_tags);
    }
}