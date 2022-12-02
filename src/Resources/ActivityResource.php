<?php

namespace AlexJustesen\FilamentSpatieLaravelActivitylog\Resources;

use AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject;
use AlexJustesen\FilamentSpatieLaravelActivitylog\RelationManagers\ActivitiesRelationManager;
use AlexJustesen\FilamentSpatieLaravelActivitylog\ResourceFinder;
use AlexJustesen\FilamentSpatieLaravelActivitylog\Resources\ActivityResource\Pages;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-table';

    public static function getLabel(): string
    {
        return __('filament-spatie-activitylog::activity.label');
    }

    public static function getPluralLabel(): string
    {
        return __('filament-spatie-activitylog::activity.plural_label');
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('causer_type')
                    ->label(__('filament-spatie-activitylog::activity.causer_type'))
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 1
                    ]),
                Forms\Components\TextInput::make('causer_id')
                    ->label(__('filament-spatie-activitylog::activity.causer_id'))
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 1
                    ]),
                Forms\Components\TextInput::make('subject_type')
                    ->label(__('filament-spatie-activitylog::activity.subject_type'))
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 1
                    ]),
                Forms\Components\TextInput::make('subject_id')
                    ->label(__('filament-spatie-activitylog::activity.subject_id'))
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 1
                    ]),
                Forms\Components\TextInput::make('description')
                    ->label(__('filament-spatie-activitylog::activity.description'))->columnSpan(2),
                Forms\Components\KeyValue::make('properties.attributes')
                    ->label(__('filament-spatie-activitylog::activity.attributes'))
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 1
                    ]),
                Forms\Components\KeyValue::make('properties.old')
                    ->label(__('filament-spatie-activitylog::activity.old'))
                    ->columnSpan([
                        'default' => 2,
                        'sm' => 1
                    ]),
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
                    ->label(__('filament-spatie-activitylog::activity.description'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->label(__('filament-spatie-activitylog::activity.subject'))
                    ->hidden(fn (Component $livewire) => $livewire instanceof ActivitiesRelationManager)
                    ->getStateUsing(function (Activity $record) {
                        if (! $record->subject || ! $record->subject instanceof IsActivitySubject) {
                            return new HtmlString('&mdash;');
                        }

                        /** @var \AlexJustesen\FilamentSpatieLaravelActivitylog\Contracts\IsActivitySubject */
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

                        if (! $resource::hasPage('edit')) {
                            return;
                        }

                        return $resource::getUrl('edit', ['record' => $record->subject]) ?? null;
                    }, shouldOpenInNewTab: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-spatie-activitylog::activity.logged_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('has_subject') ->label(__('filament-spatie-activitylog::activity.has_subject'))
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
