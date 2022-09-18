<?php

namespace App\States\Post;

class PostBaseState
{
    const NEXT = [];

    public function getAllStates(): array
    {
        return [
            Draft::TITLE,
            Review::TITLE,
            Published::TITLE,
            Rejected::TITLE,
        ];
    }

    public function getTitle(): string
    {
        return static::TITLE;
    }

    public function getColor(): string
    {
        return static::COLOR;
    }

    public function getNext(): array
    {
        return static::NEXT;
    }

    public static function getPermittedRolesValues(): array
    {
        return array_column(static::PERMITTED_ROLES, 'value');
    }

    public function getNextResources(): array
    {
        $resources = [];
        foreach ($this->getNext() as $next) {
            $resources[] = [
                'title' => $next::TITLE,
                'color' => $next::COLOR,
                'roles' => array_column($next::PERMITTED_ROLES, 'value')
            ];
        }

        return $resources;
    }

    public function isPermittedByGivenStateAndRole($stateTitle, $role): bool
    {
        foreach($this->getNext() as $stateClassName) {
            if($stateClassName::TITLE != $stateTitle) {
                continue;
            }

            if(in_array($role, $stateClassName::getPermittedRolesValues())) {
                return true;
            }
        }

        return false;
    }
}
