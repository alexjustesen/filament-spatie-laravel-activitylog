<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog\RelationManagers;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\RelationManagers\RelationManager;
use AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;

class ActivitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';

    protected static ?string $recordTitleAttribute = 'description';

    public function form(Form $form): Form
    {
        return ActivityResource::form($form);
    }

    public function table(Table $table): Table
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
