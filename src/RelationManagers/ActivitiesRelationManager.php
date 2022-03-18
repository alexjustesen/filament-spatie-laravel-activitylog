<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog\RelationManagers;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class ActivitiesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'activities';

    protected static ?string $recordTitleAttribute = 'description';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return ActivityResource::table($table)
            ->bulkActions([])
            ->pushActions([
                Tables\Actions\LinkAction::make('View')
                    ->url(fn ($record) => ActivityResource::getUrl('view', ['record' => $record]), shouldOpenInNewTab: true),
            ]);
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
