<?php

namespace RyanChandler\FilamentSpatieLaravelActivitylog\Resources;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use RyanChandler\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject;
use RyanChandler\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager;
use RyanChandler\FilamentSpatieLaravelActivitylog\ResourceFinder;
use RyanChandler\FilamentSpatieLaravelActivitylog\Resources\ActivityResource\Pages;
use Spatie\Activitylog\Models\Activity;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-table';

    protected static ?string $pluralLabel = 'Activity';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('description'),
                Forms\Components\KeyValue::make('properties.attributes'),
                Forms\Components\KeyValue::make('properties.old'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->label('Subject')
                    ->hidden(fn (Component $livewire) => $livewire instanceof ActivitiesRelationManager)
                    ->getStateUsing(function (Activity $record) {
                        if (! $record->subject || ! $record->subject instanceof IsActivitySubject) {
                            return new HtmlString('&mdash;');
                        }

                        /** @var \RyanChandler\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject */
                        $subject = $record->subject;

                        return $subject->getActivitySubjectDescription($record);
                    })
                    ->url(function (Activity $record) {
                        if (! $record->subject || ! $record->subject instanceof IsActivitySubject) {
                            return;
                        }

                        /** @var class-string<\Filament\Resources\Resource> */
                        $resource = ResourceFinder::find($record->subject::class);

                        if (! $resource) {
                            return;
                        }

                        return $resource::getUrl('edit', ['record' => $record->subject]) ?? null;
                    }, shouldOpenInNewTab: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Log Date & Time')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('Has Subject')
                    ->query(fn (Builder $query) => $query->has('subject')),
            ])
            ->bulkActions([])
            ->defaultSort('created_at', 'DESC');
    }

    protected static function getNavigationGroup(): ?string
    {
        return config('filament-spatie-laravel-activitylog.resource.group') ?? parent::getNavigationGroup();
    }

    protected static function getNavigationSort(): ?int
    {
        return config('filament-spatie-laravel-activitylog.resource.sort') ?? parent::getNavigationSort();
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'view' => Pages\ViewActivity::route('/{record}'),
        ];
    }
}
