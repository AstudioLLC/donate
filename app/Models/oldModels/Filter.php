<?php

namespace App\Models;


use App\Traits\HasTranslations;
use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class Filterr extends AbstractModel
{
    use HasTranslations, Sortable;

    protected $table = 'filters';

    public $translatable = [
        'name'
    ];

    public function fillRequest(Request $request)
    {
        $this->setTranslations('name', $request->input('name'));
        $this->is_active = $request->has('is_active');

        if (!$this->save()) {
            return false;
        }

        $touchedCriteria = [];
        if (count($newCriteria = $request->input('criterion.new', []))) {
            $insertData = [];

            foreach ($newCriteria as $newCriterion) {
                $insertData[]['name'] = $newCriterion;
            }

            $createdCriteria = $this->criteria()->createMany($insertData);
            $touchedCriteria = array_merge($touchedCriteria, $createdCriteria->pluck('id')->toArray());
        }
        if (count($oldCriteria = $request->input('criterion.old', []))) {
            foreach ($oldCriteria as $id => $oldCriterion) {
                $touchedCriteria[] = $id;
                $this->criteria()->where('id', $id)->update(['name' => $oldCriterion]);
            }
        }

        $this->criteria()->whereNotIn('id', $touchedCriteria)->delete();

        return true;
    }

    public function criteria()
    {
        return $this->hasMany(Criterion::class, 'filter_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_filter_relations', 'filter_id', 'category_id');
    }
}
