<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Option
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $name
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Option whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Option whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Option whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Option whereValue($value)
 * @mixin \Eloquent
 */
class Option extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var [type]
     */
    protected $fillable = [
        'key',
        'value',
        'name',
        'description'
    ];

    /**
     * Determine if the given option value exists.
     *
     * @param  string $key
     * @return bool
     */
    public function exists($key) {
        return self::where('key', $key)->exists();
    }

    /**
     * Get the specified option value.
     *
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    public function get($key, $default = null) {
        if ($option = self::where('key', $key)->first()) {
            return $option->value;
        }

        return $default;
    }

    /**
     * Set a given option value.
     *
     * @param  array|string $key
     * @param  mixed $value
     * @return void
     */
    public function set($key, $value = null) {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            self::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // @todo: return the option
    }

    /**
     * Remove/delete the specified option value.
     *
     * @param  string $key
     * @return bool
     */
    public function remove($key) {
        return (bool)self::where('key', $key)->delete();
    }
}
