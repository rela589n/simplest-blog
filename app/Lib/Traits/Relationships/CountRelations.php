<?php


namespace App\Lib\Traits\Relationships;


trait CountRelations
{
    private function getRelationsCount(string $relationName, &$count)
    {
        if ($count !== null) {
            return $count;
        }

        if ($this->relationLoaded($relationName)) {
            $count = $this->{$relationName}->count();
        } else {
            $count = $this->{$relationName}()->count();
        }

        return $this->{"${relationName}_count"} = $count;
    }
}
