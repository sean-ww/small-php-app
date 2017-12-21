<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Slugs Model - An eloquent model for handling short url slugs.
 */
class Slugs extends Eloquent
{
    /** @var bool $timestamps Turn off eloquent timestamps. */
    public $timestamps = false;

    /** @var array $guarded Define attributes blocked from mass assignment. */
    protected $guarded = array('id');

    /** @var array $chars Characters used in generating a slug. */
    protected $chars = "123456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ";

    /**
     * Create Slug
     *
     * If a valid url is supplied, generate and store a slug to return.
     *
     * @param string $url The url to be added.
     *
     * @return null|string The new slug, or null.
     */
    public function createSlug($url)
    {
        if (substr($url, 0, 4) !== 'http') {
            $url = 'http://' . $url;
        }
        if ($this->validateUrl($url)) {
            // Add the url record
            $insert = $this->create([
                'long_url' => $url
            ]);
            $newId = $insert->id;

            // Create the slug using the id
            $newSlug = $this->generateSlug($newId);

            // Update the record with the slug
            $update = $this->where('id', $newId)->update([
                'slug' => $newSlug
            ]);

            if ($update) {
                return $newSlug;
            }

        }
        return null;
    }

    /**
     * Validate a url
     *
     * @param string $url A url string.
     *
     * @return bool True if the url is valid.
     */
    public function validateUrl($url)
    {
        if (empty($url)) {
            return false;
        }
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }
        return true;
    }

    /**
     * Generate a slug string
     *
     * @param integer $id An input id for random slug generation.
     *
     * @return string A random slug string.
     */
    public function generateSlug($id)
    {
        $randomStringLength = 6;
        $randomString = '';
        $possibleCharacters = '2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ';

        $iteration = 0;
        while ($iteration < $randomStringLength) {
            $character = substr($possibleCharacters, mt_rand(0, $randomStringLength - 1), 1);
            if (!strstr($randomString, $character)) {
                $randomString .= $character;
                $iteration++;
            }
        }

        $randomValue = substr($id, 0, 5) . $randomString;
        return $randomValue;
    }
}
