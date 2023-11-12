<?php
class ListingFeatured extends ListingPremium
{
    protected $coc;
    protected $status = 'premium';

    public function setValues($data = []) {
        parent::setValues($data);
        if (isset($data['coc'])) {
            $this->setCoc($data['coc']);
        }
    }
    /**
     * Gets the local property $coc
     * @return string
     */
    public function getCoc()
    {
        return $this->coc;
    }

    /**
     * Cleans up and sets the local property $coc
     * @param string $value to set property
     */
    public function setCoc($value)
    {
        $this->coc = trim(strip_tags($value, self::$allowed_tags));
    }

    public static function dispalyAllowedTags(){
        return htmlspecialchars(self::$allowed_tags);
    }
}