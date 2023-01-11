<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog\RelationManagers;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Model;

class ActivitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';

    protected static ?string $recordTitleAttribute = 'description';

    public static function form(Form $form): Form
    {
        return ActivityResource::form($form);
    }

    public static function table(Table $table): Table
    {
        return ActivityResource::table($table);
    }

    protected function canCreate(): bool
    {
        return false;
    }

    protected function canEdit(Model $record): bool
    {
        return false;
    }

    protected function canDelete(Model $record): bool
    {
        return false;
    }
}
