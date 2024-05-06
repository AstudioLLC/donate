<?php

namespace App\Models;

use App\Models\Traits\Relationships\ChatRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends AbstractModel
{
    use ChatRelationships, SoftDeletes;

    protected $table = 'chat';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'sponsor_id',
        'children_id',
        'file',
        'message',
        'message_from',
        'is_read',
        'admin_is_read',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @var array[]
     */

    protected $casts = [
        'is_read' => 'boolean',
        'admin_is_read' => 'boolean'
    ];
    public static $imageSizes = [
        [
            'width' => 1,
            'height' => 1,
            'entityPath' => 'chat',
            'size' => 'thumbnail',
        ],
    ];

    /**
     * @var string
     */
    public static $imagePath = '/chat/';

    public function checkFileType($fileName = null)
    {
        $type = '';
        if ($fileName) {
            if (in_array(pathinfo($this->getImageUrl('thumbnail', $fileName), PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png', 'gif', 'svg'])) {
                $type = 'image';
            } else {
                $type = 'file';
            }
        }
        return $type;
    }
}
